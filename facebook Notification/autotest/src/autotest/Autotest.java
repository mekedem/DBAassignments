package autotest;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;


public class Autotest {

    public static void main(String[] args) {
        
        System.setProperty("webdriver.chrome.driver","chromedriver.exe"); 
        WebDriver driver = new ChromeDriver();

        driver.get("https://www.facebook.com");

        WebElement name = driver.findElement(By.name("email"));
        WebElement pass = driver.findElement(By.name("pass"));
        
        try{
            Thread.sleep(2000);
        }
        catch(Exception e){
        }

        name.sendKeys("0933720***");
        pass.sendKeys("");
        
        WebElement button  = driver.findElement(By.id("loginbutton"));
        
        try{
            Thread.sleep(2000);
        }
        catch(Exception e){
        }
        
        button.click();
        
         WebElement notification = driver.findElement(By.id("notificationsCountValue"));
        
        System.out.println("number of notifications is "+ notification.getText());
        
        try{
            Thread.sleep(2000);
        }
        catch(Exception e){
        }
        
        driver.close();
    }
    
}
