package remoteserv;

import java.io.*;
import java.net.*;

public class RemoteServ {

    public static void main(String[] args) throws IOException {
        ServerSocket sersock = new ServerSocket(3000);
        System.out.println("server is ready");
        Socket sock = sersock.accept();
        
        OutputStream ostream = sock.getOutputStream();
        PrintWriter pwrite = new PrintWriter(ostream, true);
        
        InputStream istream = sock.getInputStream();
        BufferedReader receiveRead = new BufferedReader(new InputStreamReader(istream));
        
        String receiveMessage, sendMessage, fun;
        int a, b, c;
        
        while(true){
            fun = receiveRead.readLine();
            if(fun != null){
                System.out.println("operation : " + fun);
            }
            a = Integer.parseInt(receiveRead.readLine());
            System.out.println("Parameter 1 : " + a);
            b = Integer.parseInt(receiveRead.readLine());
            
            if(fun.compareTo("add")==0){
                c = a + b;
                System.out.println("Addition = "+ c);
                pwrite.println("Addition = "+ c);
            }
            
            if(fun.compareTo("sub")==0){
                c = a - b;
                System.out.println("Subtraction = "+ c);
                pwrite.println("Subtraction = "+ c);
            }
            System.out.flush();
        }
    } 
}
