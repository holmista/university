public class Main {
    public static void main(String args[]){
        Calculator calculator = new Calculator();
        calculator.expression = "3/1.5+2*(1+(1+(1+1+2^(3-4/(2+2)*1))))";
        try{
            calculator.checkOperatorsArePlacedValid();
            calculator.checkParenthesesArePlacedValid();
            calculator.checkExpressionContainsInvalidCharacters();
            String parsed = calculator.parseParentheses();
            System.out.println(parsed);
            System.out.println(calculator.evaluateExpression(parsed));
        }
        catch (Exception e){
            System.out.println(e.getMessage());
        }
    }
}

