import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.*;
import java.math.BigDecimal;

class CalculatorTest {
    Calculator calculator = new Calculator();

    @Test
    void checkExpressionContainsInvalidCharacters() {
        assertAll(()->assertThrows(Exception.class, ()-> {
            calculator.expression = "67e";
            calculator.checkExpressionContainsInvalidCharacters();
        }), ()->assertThrows(Exception.class, ()-> {
            calculator.expression = "6+7*{4-3}";
            calculator.checkExpressionContainsInvalidCharacters();
        }), ()->assertThrows(Exception.class, ()-> {
            calculator.expression = "6+2-#";
            calculator.checkExpressionContainsInvalidCharacters();
        }), ()->assertDoesNotThrow(()->{
                calculator.expression = "1+2.3";
                calculator.checkExpressionContainsInvalidCharacters();
        }), ()->assertDoesNotThrow(()->{
            calculator.expression = "1+2.3-7897^-+";
            calculator.checkExpressionContainsInvalidCharacters();
        }), ()->assertDoesNotThrow(()->{
            calculator.expression = "+)*^--";
            calculator.checkExpressionContainsInvalidCharacters();
        }));
    }

    @Test
    void checkOperatorsArePlacedValid() {
        assertAll(()->assertThrows(Exception.class, ()->{
            calculator.expression = "1++2";
            calculator.checkOperatorsArePlacedValid();
        }), ()->assertThrows(Exception.class, ()->{
            calculator.expression = "--1+2";
            calculator.checkOperatorsArePlacedValid();
        }), ()->assertThrows(Exception.class, ()->{
            calculator.expression = "1+2*+4";
            calculator.checkOperatorsArePlacedValid();
        }), ()->assertDoesNotThrow(()->{
            calculator.expression = "2-1";
            calculator.checkOperatorsArePlacedValid();
        }), ()->assertDoesNotThrow(()->{
            calculator.expression = "1+2*3^2";
            calculator.checkOperatorsArePlacedValid();
        }));
    }

    @Test
    void checkParenthesesArePlacedValid() {
        assertAll(()->assertThrows(Exception.class, ()->{
            calculator.expression = "(1+2)*5(";
            calculator.checkParenthesesArePlacedValid();
        }), ()->assertThrows(Exception.class, ()->{
            calculator.expression = "(1+2)*((1+2)/(3+2)";
            calculator.checkParenthesesArePlacedValid();
        }), ()->assertThrows(Exception.class, ()->{
            calculator.expression = "((())";
            calculator.checkParenthesesArePlacedValid();
        }), ()->assertDoesNotThrow(()->{
            calculator.expression = "(1+2)*5*(1-2)";
            calculator.checkParenthesesArePlacedValid();
        }), ()->assertDoesNotThrow(()->{
            calculator.expression = "(1+2)*((1+2)/(3+2))";
            calculator.checkParenthesesArePlacedValid();
        }), ()->assertDoesNotThrow(()->{
            calculator.expression = "((()))";
            calculator.checkParenthesesArePlacedValid();
        }), ()->assertThrows(Exception.class, ()->{
            calculator.expression = "6(2+9)";
            calculator.checkParenthesesArePlacedValid();
        }), ()->assertThrows(Exception.class, ()->{
            calculator.expression = "(2+9)6";
            calculator.checkParenthesesArePlacedValid();
        }), ()->assertThrows(Exception.class, ()->{
            calculator.expression = "6(.2+9)";
            calculator.checkParenthesesArePlacedValid();
        }), ()->assertThrows(Exception.class, ()->{
            calculator.expression = "6(2+9.)";
            calculator.checkParenthesesArePlacedValid();
        }));
    }

    @Test
    void parseParentheses() {
        assertAll(()->{
            calculator.expression = "1+(2+3)";
            assertEquals("1+5.0", calculator.parseParentheses());
        }, ()->{
            calculator.expression = "(1+2)*((1+3)/(3-1))";
            assertEquals("3.0*2.0", calculator.parseParentheses());
        }, ()->{
            calculator.expression = "(2+3^(4/2+1))+6/9+4^2";
            assertEquals("29.0+6/9+4^2", calculator.parseParentheses());
        });
    }

    @Test
    void evaluateExpression() {
        assertAll(()->{
            calculator.expression = "1+(2+3)";
            String parsed = calculator.parseParentheses();
            assertEquals(6.0, calculator.evaluateExpression(parsed));
        }, ()->{
            calculator.expression = "(1+2)*((1+3)/(3-1))";
            String parsed = calculator.parseParentheses();
            assertEquals(6.0, calculator.evaluateExpression(parsed));
        }, ()->{
            calculator.expression = "(2+3^(4/2+1))+9/3+4^2";
            String parsed = calculator.parseParentheses();
            assertEquals(48.0, calculator.evaluateExpression(parsed));
        }, ()->{
            assertEquals(50, calculator.evaluateExpression("1+4*2+1/2+0.5+40"));
        }, ()->{
            assertEquals(-6, calculator.evaluateExpression("0-2*3"));
        }, ()->{
            calculator.expression = "16^(1/4)-9^(1-1/2)";
            String parsed = calculator.parseParentheses();
            assertEquals(-1, calculator.evaluateExpression(parsed));
        }, ()->{
            calculator.expression = "2^(-2)";
            String parsed = calculator.parseParentheses();
            assertEquals(0.25, calculator.evaluateExpression(parsed));
        }, ()->{
            calculator.expression = "2^(-2*1/2)";
            String parsed = calculator.parseParentheses();
            assertEquals(0.5, calculator.evaluateExpression(parsed));
        }, ()->{
            calculator.expression = "-4^(-2*1/2)";
            String parsed = calculator.parseParentheses();
            assertEquals(-0.25, calculator.evaluateExpression(parsed));
        }, ()->{
            calculator.expression = "-4^2-0.5^2/0.5";
            String parsed = calculator.parseParentheses();
            assertEquals(-16.5, calculator.evaluateExpression(parsed));
        }, ()->{
            calculator.expression = "-4^(2-0.5^(2/0.5))";
            String parsed = calculator.parseParentheses();
            double number = calculator.evaluateExpression(parsed);
            BigDecimal roundedNumber = new BigDecimal(number).setScale(2, 1);
            assertEquals(-14.67, roundedNumber.doubleValue());
        }, ()->{
            calculator.expression = "3/1.5+2*(1+(1+(1+1+2^(3-4/(2+2)*1))))";
            String parsed = calculator.parseParentheses();
            assertEquals(18, calculator.evaluateExpression(parsed));
        });
    }
}