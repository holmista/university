import java.util.Scanner;

public class A {
    int a,b;
    public void assign(){
        Scanner scanner = new Scanner(System.in);  // Create a Scanner object
        System.out.println("Enter value for a: ");
        String aValue = scanner.nextLine();
        System.out.println("Enter value for b: ");
        String bValue = scanner.nextLine();
        this.a = Integer.parseInt(aValue);
        this.b = Integer.parseInt(bValue);
        scanner.close();
    }
    public void printSum(){
        System.out.println(this.a+this.b);
    }
    public int getProduct(){
        return this.a*this.b;
    }
}
