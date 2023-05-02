package Client;

import java.io.IOException;
import java.io.ObjectOutputStream;
import java.io.PrintWriter;
import java.net.Socket;
import java.util.Scanner;

public class SendMessage extends Thread{
    private Socket socket;
    public SendMessage(Socket socket){
        this.socket = socket;
    }
    @Override
    public void run(){
        Scanner scanner = new Scanner(System.in);
        while(true){
            System.out.println("Enter your message: ");
            String message = scanner.nextLine();
            System.out.println("scanner message: "+message);
            try{
                PrintWriter writer = new PrintWriter(this.socket.getOutputStream(), true);
                writer.println(message+"\nEND_OF_MESSAGE");
            }catch (IOException e){
                System.out.println("could not send message: "+e.getMessage());
            }
        }
    }
}
