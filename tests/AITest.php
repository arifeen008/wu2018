<?php

use PHPUnit\Framework\TestCase;

final class AITest extends TestCase
{
    public function testGender_Male(): void
    {
        $result = AI::getGender('สวัสดีครับ');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }

    public function testGender_Feale(): void
    {
        $result = AI::getGender('สวัสดีค่ะ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }
    public function testGender_Unknown(): void
    {
        $result = AI::getGender('สวัสดี');
        $expected_result = 'Unknown';
        $this->assertEquals($expected_result, $result);
    }
    public function testSentiment_Positive(): void
    {
        $result = AI::getSentiment('ฉันสบายใจดี');
        $expected_result = 'Positive';
        $this->assertEquals($expected_result, $result);
    }
    public function testSentiment_Negative(): void
    {
        $result = AI::getSentiment('ฉันรู้สึกอิจฉาเธอ');
        $expected_result = 'Negative';
        $this->assertEquals($expected_result, $result);
    }
    public function testSentiment_Neutral(): void
    {
        $result = AI::getSentiment('ฉันรู้สึกเฉยๆในตอนนี้');
        $expected_result = 'Neutral';
        $this->assertEquals($expected_result, $result);
    }
}