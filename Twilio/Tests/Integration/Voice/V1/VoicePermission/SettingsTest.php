<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Voice\V1\VoicePermission;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class SettingsTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->voice->v1->voicePermissions
                                    ->settings()->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://voice.twilio.com/v1/Settings'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "dialing_permissions_inheritance": true,
                "url": "https://voice.twilio.com/v1/Settings"
            }
            '
        ));

        $actual = $this->twilio->voice->v1->voicePermissions
                                          ->settings()->fetch();

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->voice->v1->voicePermissions
                                    ->settings()->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://voice.twilio.com/v1/Settings'
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            202,
            '
            {
                "dialing_permissions_inheritance": true,
                "url": "https://voice.twilio.com/v1/Settings"
            }
            '
        ));

        $actual = $this->twilio->voice->v1->voicePermissions
                                          ->settings()->update();

        $this->assertNotNull($actual);
    }
}