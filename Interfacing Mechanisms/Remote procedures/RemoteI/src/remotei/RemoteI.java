package remotei;

import java.io.*;
import java.net.*;

/**
 *
 * @author Mekedem
 */
public class RemoteI {
    
    public static void main(String[] args) throws Exception {
        
        Socket sock = new Socket("127.0.0.1", 3000);
        BufferedReader KeyRead = new BufferedReader(new InputStreamReader(System.in));
        
        InputStream istream = sock.getInputStream();
        OutputStream ostream = sock.getOutputStream();
        
        BufferedReader receiveRead = new BufferedReader(new InputStreamReader(istream));
        PrintWriter pwrite = new PrintWriter(ostream, true);
        System.out.println("Client ready, type the operation and press Enter Key");
        
        String receiveMessage, sendMessage, temp;
        
        while(true){
            System.out.println("enter Operation to perform (add, sub)");
            temp = KeyRead.readLine();
            sendMessage = temp.toLowerCase();
            pwrite.println(sendMessage);
            
            System.out.println("Enter first parameter: ");
            sendMessage = KeyRead.readLine();
            pwrite.println(sendMessage);
            
            System.out.println("Enter Second parameter : ");
            sendMessage = KeyRead.readLine();
            pwrite.println(sendMessage);
            
            System.out.flush();
            if((receiveMessage = receiveRead.readLine())!=null){
                System.out.println(receiveMessage);
            }
        }
    }
}
