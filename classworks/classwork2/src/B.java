import java.util.Scanner;
import java.util.Collections;
import java.util.Arrays;

public class B {
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
    public void printMAx(){
        System.out.println(Collections.max(Arrays.asList(a, b, c)));
    }
    public int getMin(){
        return Collections.min(Arrays.asList(a, b, c));
    }
}
