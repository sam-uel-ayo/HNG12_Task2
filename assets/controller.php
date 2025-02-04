<?
namespace Number;

use cUtils\cUtils;

class Number
{
    public static function classifyNumber($number)
    {
        if (filter_var($number, FILTER_VALIDATE_INT) === false) { 
            return json_decode(cUtils::returnData(false, cUtils::errorMessage($number), true, 400));
        }

        // Convert to integer
        $number = (int) $number;

        if ($number > PHP_INT_MAX) { 
            return json_decode(cUtils::returnData(false, cUtils::errorMessage($number), true, 400));
        }
        
        // Return Response
        $data =  [
            "number" => (int)$number,
            "is_prime" => self::isPrime($number),
            "is_perfect" => self::isPerfect($number),
            "properties" => self::getProperties($number),
            "digit_sum" => self::digitSum($number),
            "fun_fact" => self::getFunFact($number)
        ];
        return json_decode(cUtils::returnData(false, $data, true, 200));
    
    }

    

    // Prime Number Check
    public static function isPrime($number): bool {
        if ($number < 2) return false;
        for ($i = 2; $i * $i <= $number; $i++) {
            if ($number % $i === 0) return false;
        }
        return true;
    }

    // Perfect Number check
    public static function isPerfect($number): bool {
        $sum = 0;
        for ($i = 1; $i < $number; $i++) {
            if ($number % $i === 0) $sum += $i;
        }
        if ($sum !== $number) return false;
        return true;;
    }


    // Properties
    public static function getProperties($number) {
        $properties = array();

        // Check if the number is Armstrong
        if (self::isArmstrong($number)) {
            $properties[] = "armstrong";
        }

        // Check if the number is even or odd
        $properties[] = ($number % 2 === 0) ? "even" : "odd";
        return $properties;
    }

    // Armstrong check
    public static function isArmstrong($number): bool {
        $sum = 0;
        $digits = str_split((string) $number);
        $power = count($digits);

        foreach ($digits as $digit) {
            $sum += pow((int)$digit, $power);
        }
        return (int)$sum === (int)$number; // Ensure both are integers for comparison
    }

    // Sum of digits
    public static function digitSum($number): int {
        $sum = array_sum(str_split((string) abs($number))); // Get absolute digit sum
        return ($number < 0) ? -$sum : $sum; // If original number was negative, return negative sum
    }    

    // Get fun fact
    public static function getFunFact($number): string {
        $apiUrl = "http://numbersapi.com/" . $number . "/math";
        $fact = @file_get_contents($apiUrl);
        return $fact ?: "No fact available.";
    }

}