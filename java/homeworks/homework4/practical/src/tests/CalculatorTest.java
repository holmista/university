package tests;
import calculator.Calculator;

public class CalculatorTest {
    public void testForInvalidCharacters(){
        Calculator calculator = new Calculator();
        calculator.expression = "5ty";
//        assert calculator.checkExpressionContainsInvalidCharacters();
    }
}
