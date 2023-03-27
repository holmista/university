package calculator;

import java.util.Arrays;
import java.util.Scanner;
import java.util.*;
import java.util.regex.Matcher;
import java.util.regex.Pattern;


public class Calculator {
    public String expression;
    private final List<Character> validCharacters = new ArrayList<Character>();
    private final List<Character> operators = new ArrayList<Character>(); //{'+', '-', '*', '/', '^'};
    private final List<Character> parentheses = new ArrayList<Character>(); //{'(', ')'};
    public Calculator(){
        this.operators.add('+');
        this.operators.add('-');
        this.operators.add('*');
        this.operators.add('/');
        this.operators.add('^');
        this.parentheses.add('(');
        this.parentheses.add(')');
        this.validCharacters.addAll(this.operators);
        this.validCharacters.addAll(this.parentheses);
    }
    public String readLine(){
        Scanner scanner = new Scanner(System.in);
        System.out.println("Enter expression to evaluate: ");
        this.expression = scanner.nextLine();
        scanner.close();
        return this.expression;
    }
    public void checkExpressionContainsInvalidCharacters() throws Exception {
        if(this.expression.length()==0) throw new Exception("expression is empty");
        for (int i=0; i<this.expression.length(); i++) {
            boolean isValid = false;
            for (char validCharacter : this.validCharacters) {
                if(this.expression.charAt(i) == validCharacter || String.valueOf(expression.charAt(i)).matches("-?\\d+(\\.\\d+)?"))
                    isValid = true;
            }
            if(!isValid) throw new Exception("invalid character in expression: "+this.expression.charAt(i));
        }
    }
    public void checkOperatorsArePlacedValid() throws Exception{
        if(this.operators.contains(expression.charAt(0)))
            throw new Exception("expression can not start with "+expression.charAt(0)+" operator");
        if(this.operators.contains(expression.charAt(expression.length()-1)))
            throw new Exception("expression can not end with "+expression.charAt(expression.length()-1)+" operator");
        for (int i=1; i<this.expression.length()-1; i++) {
            for (char operator : this.operators) {
                if(this.expression.charAt(i) == operator){
                    if(!(this.expression.charAt(i-1)==')' || String.valueOf(expression.charAt(i-1)).matches("-?\\d+(\\.\\d+)?")))
                        throw new Exception("operator placement is invalid");
                    if(!(this.expression.charAt(i+1)=='(' || String.valueOf(expression.charAt(i+1)).matches("-?\\d+(\\.\\d+)?")))
                        throw new Exception("operator placement is invalid");

                }
            }
        }
    }
    public void checkParenthesesArePlacedValid() throws Exception{
        int openParens = 0;
        int closeParens = 0;
        for(int i=0; i<this.expression.length(); i++){
            char character = this.expression.charAt(i);
            if(character=='(')
                closeParens++;
            if(character==')')
                closeParens++;
        }
        if(openParens != closeParens) throw new Exception("parentheses are not placed correctly");
    }

    public double evaluateSingleExpression(String expression){ // receives a single expression like this: 187+2
        String operator = "";
        String operandOne = "";
        String operandTwo = "";
        Pattern pattern = Pattern.compile("([0-9]+)([+\\-*/^])([0-9]+)");
        Matcher matcher = pattern.matcher(expression);
        while (matcher.find()) {
             operandOne = matcher.group(1);
             operator = matcher.group(2);
             operandTwo = matcher.group(3);
        }
        double operandOneParsed = Double.parseDouble(operandOne);
        double operandTwoParsed = Double.parseDouble(operandTwo);
        switch (operator){
            case "+":
                return operandOneParsed+operandTwoParsed;
            case "-":
                return operandOneParsed-operandTwoParsed;
            case "*":
                return operandOneParsed*operandTwoParsed;
            case "/":
                return operandOneParsed/operandTwoParsed;
            case "^":
                return Math.pow(operandOneParsed, operandTwoParsed);
        }
        return 0;
    }

    public String parseParentheses(String expression){
        StringBuilder sb = new StringBuilder(expression);
        List<Integer[]> pairs = new ArrayList<>();
        Stack<Integer> stack = new Stack<>();
        for(int i=0; i<sb.length(); i++){
            if(sb.charAt(i)=='(')
                stack.add(i);
            if(sb.charAt(i)==')'){
                Integer pair[] = {stack.peek(), i};
                stack.pop();
                pairs.add(pair);
            }
        }
        int offset = 0;
        for(Integer[] pair:pairs){
            String expressionPart = sb.substring(pair[0]+1, pair[1]);
            double evaluated = this.evaluateExpression(expressionPart);
            int lenToAppend = pair[1] - pair[0] + 1 - (""+evaluated).length();
            sb.replace(pair[0], pair[1]+1, ""+evaluated+"@".repeat(lenToAppend));
        }
        return sb.toString().replaceAll("@", "");
    }
// (())()
    public double evaluateExpression(String expression){ // evaluates expression like 8+2*3^2
        expression = expression.replaceAll("@", "");
        String[] tokens = expression.split("(?<=[+\\-*/^])|(?=[+\\-*/^])");
        List<Double> operands = new ArrayList<>();
        List<String> operators = new ArrayList<>();
        for (String token : tokens) {
            if (token.matches("\\b(?:\\d+\\.\\d*|\\.\\d+|\\d+)\\b")) {
                operands.add(Double.parseDouble(token));
            } else {
                operators.add(token);
            }
        }
        while(!operators.isEmpty()){
            while(operators.contains("^")){
                int idx = operators.indexOf("^");
                double leftOperand = operands.get(idx);
                double rightOperand = operands.get(idx+1);
                double evaluated = Math.pow(leftOperand, rightOperand);
                operators.remove(idx);
                operands.set(idx, evaluated);
                operands.remove(idx+1);
            }
            while(operators.contains("*")){
                int idx = operators.indexOf("*");
                double leftOperand = operands.get(idx);
                double rightOperand = operands.get(idx+1);
                double evaluated = leftOperand * rightOperand;
                operators.remove(idx);
                operands.set(idx, evaluated);
                operands.remove(idx+1);
            }
            while(operators.contains("/")){
                int idx = operators.indexOf("/");
                double leftOperand = operands.get(idx);
                double rightOperand = operands.get(idx+1);
                double evaluated = leftOperand / rightOperand;
                operators.remove(idx);
                operands.set(idx, evaluated);
                operands.remove(idx+1);
            }
            while(operators.contains("+")){
                int idx = operators.indexOf("+");
                double leftOperand = operands.get(idx);
                double rightOperand = operands.get(idx+1);
                double evaluated = leftOperand+rightOperand;
                operators.remove(idx);
                operands.set(idx, evaluated);
                operands.remove(idx+1);
            }
            while(operators.contains("-")){
                int idx = operators.indexOf("-");
                double leftOperand = operands.get(idx);
                double rightOperand = operands.get(idx+1);
                double evaluated = leftOperand-rightOperand;
                operators.remove(idx);
                operands.set(idx, evaluated);
                operands.remove(idx+1);
            }
        }
        return operands.get(0);
    }

//    public void simplifyParentheses(String expression) throws Exception { // receives a single parentheses expression like this: (1+2)
//
//    }
}
