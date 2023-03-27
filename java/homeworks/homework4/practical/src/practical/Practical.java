package practical;
import java.io.*;
import java.lang.StringBuilder;
import java.util.HashMap;
import java.util.Map;
import java.util.Scanner;
import java.util.Random;

interface ReadFileHandler{
    String ReadFile(FileReader file) throws IOException;
}

class FileBuffer implements ReadFileHandler{
    public String ReadFile(FileReader file) throws IOException {
        BufferedReader buffer = new BufferedReader(file);
        String line;
        StringBuilder sb = new StringBuilder();
        try{
            while ((line = buffer.readLine()) != null) {
                sb.append(line);
            }
            return sb.toString();
        }
        catch (IOException e){
            throw e;
        }
    }
}
class FileScanner implements ReadFileHandler{
    public String ReadFile(FileReader file){
        Scanner scanner = new Scanner(file);
        StringBuilder sb = new StringBuilder();
        while(scanner.hasNext()){
            sb.append(scanner.nextLine());
        }
        return sb.toString();
    }
}

public class Practical {
    public static void main(String args[]){
        Practical practical =  new Practical();
        ReadFileHandler fs = new FileScanner();
        Map<String, Integer> res =  practical.Fifteen(fs);
        System.out.println(res.keySet());
        System.out.println(res.values());
    }
    Practical(){
        this.CreateDir("myFiles");
        this.CreateDir("myFiles1");
        this.CreateDir("myFiles2");
    }
    void CreateDir(String name){
        File myFilesDir = new File(name);
        if (!myFilesDir.exists()) {
            myFilesDir.mkdir();
        }
    }
    void WriteInFile(String path, String data){
        try {
            FileWriter writer = new FileWriter(path);
            writer.write(data);
            writer.close();
        }
        catch (IOException e){
            System.out.println(e);
        }
    }
    String ReadFile(String path) throws FileNotFoundException {
        try{
            FileReader file = new FileReader("path");
            Scanner scanner = new Scanner(file);
            StringBuilder sb = new StringBuilder();
            while(scanner.hasNext()){
                sb.append(scanner.nextLine());
            }
            return sb.toString();
        }
        catch (FileNotFoundException e){
            throw e;
        }
    }

    void One(){
//        მთელი 24, 39, -90 რიცხვები ჩაწერეთ data.txt ფაილში, ფაილი შექმენით myFiles
//        საქაღალდეში.
        this.WriteInFile("myFiles/data.txt", "24, 39, -90");
    }
    void Two(){
//        0-დან 100-მდე მთელი რიცხვები ჩაწერეთ data1.txt ფაილში. myFiles საქაღალდეში.
        StringBuilder numbers = new StringBuilder();
        for(int i=0; i<101; i++){
            String num = i+"\n";
            numbers.append(num);
        }
        this.WriteInFile("myFiles/data1.txt", numbers.toString());
    }
    void Three(){
//        myFiles1 საქაღალდეში საქაღალდეში შექმენით 30 ფაილი, ფაილებში ჩაწერეთ სიტყვა
//„Programmer“.
        for (int i=0; i<30; i++){
            this.WriteInFile("myFiles1/"+i+".txt", "programmer");
        }
    }
    void Four(){
//        myFiles2 საქაღალდეში საქაღალდეში შექმენით 30 ფაილი, ფაილებში ჩაწერეთ
//        სიტყვები „Programmer1“, „Programmer2“ .... „Programmer30“.
        for (int i=1; i<31; i++){
            this.WriteInFile("myFiles2/"+i+".txt", "Programmer"+i);
        }
    }
    void Five(){
//        კლავიატურიდან გადაცემული [a, b] შუალედიდან ჩაწერეთ data2.txt ფაილში 100
//        შემთხვევითი მთელი რიცხვი. ფაილი შექმენით myFiles საქაღალდეში.
        Scanner sc = new Scanner(System.in);
        System.out.println("enter number 1: ");
        int number1 = sc.nextInt();
        System.out.println("enter number 2: ");
        int number2 = sc.nextInt();
        sc.close();
        int max = Integer.max(number1, number2);
        int min = Integer.min(number1, number2);
        Random random = new Random();
        StringBuilder sb = new StringBuilder();
        for (int i=0; i<100; i++){
            int randomNumber = random.nextInt(max - min + 1) + min;
            sb.append(randomNumber+"\n");
        }
        this.WriteInFile("myFiles/data2.txt", sb.toString());
    }
    double Twelve(double p, int n, double q){
//        დაწერეთ მარტივი პროცენტის გამოსათვლელი პროგრამა. მოცემულია ოთხი მონაცემი
//        p - საწყისი თანხა,
//                n - წლების რაოდენობა,
//                q - საბოლოო თანხა.
//                k - პროცენტების რაოდენობა.
//                დანარჩენი სამი სიდიდის მიხედვით გამოთვალეთ მეოთხე.
        double delta = q-p;
        double moneyPerYear = delta/n;
        return moneyPerYear/p*100;
    }
    double Thirteen(double p, int n, double q){
//        დავწეროთ რთული პროცენტის გამოსათვლელი პროგრამა. მოცემულია ოთხი
//        მონაცემი
        return Math.pow(q/p, 1.0/n)-1;
    }
    Map<String, Integer> Fifteen(ReadFileHandler handler){
//        კლავიატურიდან შეტანილი m<=50 და n<=50 ნატურალური რიცხვების მიხედვით.
//        info.txt ფაილში ჩაწერეთ შემთხვევითი 1 ან 0 ციფრები m სტრიქონში და n სვეტში.
//        მოახდინეთ info.txt ფაილის წაკითხვა, დაითვალეთ რამდენი 1 და რამდენი 1
//        სიმბოლოა ჩაწერილი ფაილში.
        Scanner sc = new Scanner(System.in);
        System.out.println("enter first number: ");
        int m, n;
        while (true) {
            m = sc.nextInt();
            if(m<0 || m>50)
                System.out.println("number must be between 0 and 50, enter again: ");
            else break;
        }
        System.out.println("enter second number: ");
        while (true) {
            n = sc.nextInt();
            if(n<0 || n>50)
                System.out.println("number must be between 0 and 50, enter again: ");
            else break;
        }
        int nums[][] = new int[m][n];
        for(int i=0; i<m; i++){
            for(int j=0; j<n; j++){
                Random random = new Random();
                if(random.nextInt(0, 10)>3)
                    nums[i][j] = 1;
            }
        }
        StringBuilder result = new StringBuilder();
        for(int i=0; i<m; i++){
            StringBuilder sb = new StringBuilder();
            for(int j=0; j<n; j++){
                sb.append(nums[i][j]+",");
            }
            result.append(sb+"\n");
        }
        this.WriteInFile("myFiles/info.txt", result.toString());
        HashMap<String, Integer> occurances = new HashMap<>();
        try{
            FileReader file = new FileReader("myFiles/info.txt");
            String fileContent = handler.ReadFile(file);
            occurances.put("1", 0);
            occurances.put("0", 0);
            for(int i=0; i< fileContent.length(); i++){
                if(fileContent.charAt(i)=='1')
                    occurances.compute("1", (key, old)->old+1);
                if(fileContent.charAt(i)=='0')
                    occurances.compute("0", (key, old)->old+1);
            }
        }
        catch (FileNotFoundException e){
            System.out.println("file not found");
        }
        catch (IOException e){
            System.out.println("could not read file");
        }
        return occurances;
    }
}
