import calculator.Calculator;

public class Main {
    public static void main(String[] args) {
        Calculator calculator = new Calculator();
//        calculator.readLine();
        try{
//            calculator.checkExpressionContainsInvalidCharacters();
//            calculator.checkOperatorsArePlacedValid();
//            calculator.checkParenthesesArePlacedValid();
//            double result = calculator.evaluateExpression(calculator.expression);
//            String parsed = calculator.parseParentheses();
//            System.out.println(parsed);
            double res = calculator.evaluateExpression("1+2+3*5+7");
            System.out.println(res);
        } catch (Exception e){
            System.out.println(e.getMessage());
        }
    }
}