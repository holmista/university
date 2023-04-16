import java.io.FileWriter;
import java.io.IOException;

public class FamilyBudget {
    private int money;
    private String budgetLogPath = "budget.txt";

    public FamilyBudget(int money){
        this.budgetLogPath = "budget.txt";
        try{
            this.setMoney(money);
        }
        catch (Exception e){
            System.err.println(e.getMessage());
        }
    }

    public FamilyBudget(int money, String budgetLogPath){
        this.budgetLogPath = budgetLogPath;
        try{
            this.setMoney(money);
        }
        catch (Exception e){
            System.err.println(e.getMessage());
        }
    }
    private enum Category{
        Rich,
        Middle,
        Poor
    };
    public synchronized void setMoney(int money) throws Exception {
        if(money<0)
            throw new Exception("money can not be less than 0");
        if(this.logBudgetState(money))
            this.money = money;
    }

    public int getMoney(){
        return this.money;
    }

    public Category getCategory(){
        if(this.money>40000)
            return Category.Rich;
        if(this.money>10000)
            return Category.Middle;
        return Category.Poor;
    }

    private synchronized Boolean logBudgetState(int newAmount){
        try(FileWriter f = new FileWriter(this.budgetLogPath, true)){
            f.append("\n").append(String.valueOf(newAmount));
            return true;
        }
        catch (IOException e){
            System.out.println(e.getMessage());
            return  false;
        }
    }
}
