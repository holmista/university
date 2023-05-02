package Client;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;
import java.sql.SQLOutput;

public class Client {
    private String host;
    private int port;
    private Socket socket;

    public Client(String host, int port) {
        this.host = host;
        this.port = port;
    }

    public void launch(){
        this.createConnection();
        SendMessage sendMessage = new SendMessage(this.socket);
        sendMessage.start();
        this.acceptMessage();
    }

    private void createConnection() {
        try{
            this.socket = new Socket(this.host, this.port);
            System.out.println("successfully connected to server");
        } catch (IOException e){
            System.out.println("could not connect to server: "+e.getMessage());
            System.exit(1);
        }

    }
    private void acceptMessage() {
        try {
            System.out.println("client is ready to accept messages");
            BufferedReader buffer = new BufferedReader(new InputStreamReader(socket.getInputStream()));
            StringBuilder message = new StringBuilder();
            String line;
            while ((line = buffer.readLine()) != null) {
                System.out.println(line);
                if (line.equals("END_OF_MESSAGE")) {
                    System.out.println(message.toString());
                    message.setLength(0);
                } else {
                    message.append(line);
                }
            }
            System.out.println("Server closed connection");
            socket.close();
        } catch (IOException e) {
            System.out.println(e.getMessage());
        }
    }

    public void readConsoleMessages(){

    }

    public void sendMessage(String message){
        try{
            PrintWriter out = new PrintWriter(this.socket.getOutputStream(), true);
            message+="END_OF_MESSAGE";
            out.println(message);
        }catch (IOException e){
            System.out.println("could not send message to server: "+e.getMessage());
        }

    }
}
