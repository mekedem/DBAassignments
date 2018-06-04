/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package webscrapper;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

/**
 *
 * @author Mekedem
 */
public class Webscrapper {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        
        System.setProperty("webdriver.chrome.driver","chromedriver.exe"); 
        WebDriver driver = new ChromeDriver();
        
        driver.get("https://www.supersport.com/football");
 
        try{
            Thread.sleep(2000);
        }
        catch(Exception e){
        }
         
         WebElement title = driver.findElement(By.className("spotlight-title"));
        
         WebElement news = driver.findElement(By.className("spotlight-desc"));
        
         String x = title.getText();
         String y = news.getText();
         
        try{
            Thread.sleep(2000);
        }
        catch(Exception e){
       }
         
         driver.get("http://localhost/NewsFetch/view/home");
         
        try{
            Thread.sleep(2000);
        }
        catch(Exception e){
        }
        
        WebElement t = driver.findElement(By.id("title"));
        WebElement d = driver.findElement(By.id("description"));
        WebElement dd = driver.findElement(By.id("date"));
        WebElement up = driver.findElement(By.id("upload"));
        
        t.sendKeys(x);
        d.sendKeys(y);
        dd.sendKeys("11/7/2018");
        
        
        
        try{
            Thread.sleep(2000);
        }
        catch(Exception e){
        }      
        
        up.click();
        
        try{
            Thread.sleep(2000);
        }
        catch(Exception e){
        }
        
        driver.navigate().to("http://localhost/NewsFetch/view/blogg");
    }
    
}
