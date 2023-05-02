import java.util.List;

public class Main {
    public static void main(String[] args) {
        final String path = "test.txt";
        A a = new A();
        Runnable task1 = () -> {
           a.wrietFile(path);
        };
        Runnable task2 = () -> {
            List<String> arr = a.redFile(path);
            System.out.println(arr.get(0));
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