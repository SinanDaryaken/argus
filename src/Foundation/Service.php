<?php

namespace Daryakenari\Argus\Foundation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Daryakenari\Argus\Models\Cookie as CookieModel;
use Daryakenari\Argus\Models\Session as SessionModel;
use Daryakenari\Argus\Models\Browser;
use Daryakenari\Argus\Models\Device;
use Daryakenari\Argus\Models\OperatingSystem;
use Daryakenari\Argus\Models\Visit;
use Jenssegers\Agent\Agent;

class Service
{
    protected Agent $userAgent;

    public function __construct()
    {
        $this->userAgent = new Agent();
    }

    public function init(): void
    {
        if (!$this->canVisitSave()) {
            return;
        }

        $device = $this->getDevice();
        $operatingSystem = $this->getOperatingSystem();
        $browser = $this->getBrowser();
        $cookie = $this->getCookie($device, $operatingSystem, $browser);
        $session = $this->getSession($cookie);
        $this->visit($cookie, $session);
    }

    public function getCookie(Device $device, OperatingSystem $operatingSystem, Browser $browser): CookieModel
    {
        $cookieKey = Cookie::get('_datr');

        if (is_null($cookieKey)) {
            $cookieKey = $this->getUniqueKey();
            Cookie::queue('_datr', $cookieKey, 60 * 60 * 24);
        }

        return CookieModel::firstOrCreate(
            [
                'key' => $cookieKey
            ],
            [
                'device_id' => $device->id,
                'operating_system_id' => $operatingSystem->id,
                'browser_id' => $browser->id,
                'user_id' => auth('web')->id()
            ]
        );
    }

    public function getSession(CookieModel $cookie): SessionModel
    {
        $sessionKey = session('_datr');

        if (is_null($sessionKey)) {
            $sessionKey = $this->getUniqueKey();
            session(['_datr' => $sessionKey]);
        }

        return SessionModel::firstOrCreate(
            [
                'key' => $sessionKey
            ],
            [
                'cookie_id' => $cookie->id,
            ]
        );
    }

    public function getDevice(): Device
    {
        $deviceName = strtolower($this->userAgent->deviceType());

        return Device::firstOrCreate(['name' => $deviceName]);
    }

    public function getOperatingSystem(): OperatingSystem
    {
        $operatingSystemName = str_replace(['androidos'], ['android'], strtolower($this->userAgent->platform()));

        return OperatingSystem::firstOrCreate(['name' => $operatingSystemName]);
    }

    public function getBrowser(): Browser
    {
        $browserName = strtolower($this->userAgent->browser());
        return Browser::firstOrCreate(['name' => $browserName]);
    }

    private function visit(CookieModel $cookie, SessionModel $session): void
    {
        $request = request();

        $url = $this->getUrl($request);
        $ip = $request->ip();
        $referer = parse_url($request->headers->get('referer'), PHP_URL_HOST);
        list($queryString, $utm) = $this->getQueryStringAndUtm($request);

        Visit::create(
            [
                'cookie_id' => $cookie->id,
                'session_id' => $session->id,
                'url' => $url,
                'ip' => $ip,
                'hour' => date('H'),
                'week' => date('N'),
                'referer' => $referer,
                'query_string' => $queryString != '' ? $queryString : null,
                'utm' => json_encode($utm)
            ]
        );
    }

    private function canVisitSave(): bool
    {
        $request = request();
        $deviceName = strtolower($this->userAgent->deviceType());

        if ($request->ajax() || $deviceName == 'robot') {
            return false;
        }

        return true;
    }

    private function getQueryStringAndUtm(Request $request): array
    {
        $queryString = '';
        $i = 0;
        $utm = [];
        foreach ($request->all() as $key => $value) {
            if (!is_array($value)) {
                if (strpos($key, 'utm_') !== false) {
                    $utm[$key] = $value;
                }
                if ($value) {
                    if ($i == 0) {
                        $queryString .= '?' . $key . '=' . urlencode($value);
                    } else {
                        $queryString .= '&' . $key . '=' . urlencode($value);
                    }
                }
                $i++;
            }
        }

        return [$queryString, $utm];
    }

    private function getUrl(Request $request): string
    {
        return trim(ltrim($request->getPathInfo(), '/'));
    }

    private function getUniqueKey(): string
    {
        return strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6));
    }
}
