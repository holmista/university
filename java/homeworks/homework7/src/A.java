import java.io.*;
import java.util.Random;
import java.util.Scanner;

public class A implements I {
    public int arr[] = new int[15];

    public void Assign(){
        Scanner scanner = new Scanner(System.in);
        System.out.println("enter lower bound: ");
        int a = scanner.nextInt();
        System.out.println("enter upper bound: ");
        int b = scanner.nextInt();
        int min = Math.min(a, b);
        int max = Math.max(a, b);
        Random rand = new Random();
        for(int i=0; i<arr.length; i++){
            arr[i] = rand.nextInt(min, max);
        }
    }

    public int GetSum(){
        int sum = 0;
        for(int i=0; i<arr.length; i++){
            if(arr[i]<i){
                sum+=arr[i];
            }
        }
        return sum;
    }

    public int GetProduct(){
        int product = 1;
        for(int i=0; i<arr.length; i++){
            if(arr[i]>i){
                product*=arr[i];
            }
        }
        return product;
    }

    public void PrintEven(){
        for (int j : arr) {
            if (j % 2 == 0) {
                System.out.println(j);
            }
        }
    }
}
