import java.io.FileWriter;
import java.io.IOException;

public class FamilyMember {
    private String name, lastName, status;
    private short age;
    private String familyFilePath = "family.txt";
    public FamilyMember(String name, String lastName, String status, short age){
        this.name = name;
        this.lastName = lastName;
        this.status = status;
        this.age = age;
    }

    private String getProperties(){
        StringBuilder data = new StringBuilder();
        data.append(this.name).append("\n");
        data.append(this.lastName).append("\n");
        data.append(this.status).append("\n");
        data.append(this.age).append("\n");
        data.append("\n");
        return data.toString();
    }

    public void writeToFile(){
        try(FileWriter f = new FileWriter(this.familyFilePath, true)){
            String data = this.getProperties();
            f.append(data);
        }
        catch(IOException e){
            System.out.println(e.getMessage());
        }
    }

    public void getMoney(int amount, FamilyBudget fb) {
        if(fb.getMoney()>amount){
            try{
                fb.setMoney(fb.getMoney()-amount);
            }
            catch (Exception e){
                System.out.println(e.getMessage());
            }
        }
        else{
            System.out.println("not enough family budget: "+fb.getMoney());
        }
    }
}
