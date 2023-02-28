import java.util.Scanner;

public class C {
    int a,b,c;
    public void assign(){
        Scanner scanner = new Scanner(System.in);  // Create a Scanner object
        System.out.println("Enter value for a: ");
        String aValue = scanner.nextLine();
        System.out.println("Enter value for b: ");
        String bValue = scanner.nextLine();
        System.out.println("Enter value for c: ");
        String cValue = scanner.nextLine();
        this.a = Integer.parseInt(aValue);
        this.b = Integer.parseInt(bValue);
        this.c = Integer.parseInt(cValue);
    }
    public int getLastA(){
        return this.a % 10;
    }
    public int getFirstB(){
        String b = this.b+"";
        return Integer.parseInt(String.valueOf(b.charAt(0)));
    }
    public int getSUmC(){
        int cCopy = this.c;
        int sum = 0;
        while (cCopy>0){
            int digit = cCopy % 10;
            sum += digit;
            cCopy /= 10;
        }
        return sum;
    }
}
