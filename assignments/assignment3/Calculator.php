<?php
class Calculator {
    public function calc($operator, $num1 = null, $num2 = null) {
        if ($num1 === null || $num2 === null || !is_numeric($num1) || !is_numeric($num2)) {
            return "\nCannot perform operation. You must have three arguments. A string for the operator (+,-,*,/) and two integers or floats for the numbers.";
        }

        switch ($operator) {
            case '+':
                return "<p>The calculation is $num1 + $num2. The answer is " . ($num1 + $num2) . ".<p>";
            case '-':
                return "<p>The calculation is $num1 - $num2. The answer is " . ($num1 - $num2) . ".<p>";
            case '*':
                return "<p>The calculation is $num1 * $num2. The answer is " . ($num1 * $num2) . ".<p>";
            case '/':
                if ($num2 == 0) {
                    return "<p>The calculation is $num1 / $num2. The answer is cannot divide a number by zero.<p>";
                }
                return "<p>The calculation is $num1 / $num2. The answer is " . ($num1 / $num2) . ".<p>";
            default:
                return "<p>Invalid operator. Operator must be one of: +, -, *, /<p>";
        }
    }
}
?>

