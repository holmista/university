import java.io.FileWriter;
import java.io.IOException;

public class Main {
    public static void main(String[] args) {
        FamilyBudget fb = new FamilyBudget(100);
        FamilyMember fm1 = new FamilyMember("joey", "joeystar", "a", (short)20);
        FamilyMember fm2 = new FamilyMember("joe", "joestar", "b", (short)30);
        Runnable task1 = () -> {
            fm1.getMoney(50, fb);
            System.out.println("Thread 1: " + fb.getMoney());
        };
        Runnable task2 = () -> {
            fm2.getMoney(60, fb);
            System.out.println("Thread 2: " + fb.getMoney());
        };

        Thread thread1 = new Thread(task1);
        Thread thread2 = new Thread(task2);
        thread1.start();
        thread2.start();

        try {
            thread1.join();
            thread2.join();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
}