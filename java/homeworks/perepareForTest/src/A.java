import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.*;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class A {
    public void wrietFile(String path){
        try(FileWriter f = new FileWriter(path, true)){
            for(int i=0; i< 1000000; i++)
                f.write(i+"\n");
        }catch (IOException e){
            System.out.println(e.getMessage());
        }
    }
    public List<String> redFile(String path){
        try(Scanner s = new Scanner(new FileReader(path))){
            List<String> arr = new ArrayList<>();
           while (s.hasNext()){
               arr.add(s.next());
           }
            return arr;
//            b = b.
        }catch (IOException e){
            System.out.println(e.getMessage());
        }
        return null;
    }

}
