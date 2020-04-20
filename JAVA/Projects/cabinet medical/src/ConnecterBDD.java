
import java.sql.*;
import javax.swing.JOptionPane;
public class ConnecterBDD {
    Connection con;

    public ConnecterBDD() {
        try{
            Class.forName("com.mysql.jdbc.Driver");
        }catch(Exception e){
            JOptionPane.showMessageDialog(null, "Erruer driver");
        }
         
        try{

con=DriverManager.getConnection("jdbc:mysql://localhost:3306/cabinet?zeroDateTimeBehavior=convertToNull","root","Amine2016@");
  
//  localhost:3306 le serveur par default de msql
//  /niv3  : cest la base de donnée choisit 
   
        
        }
        catch(Exception e){
 JOptionPane.showMessageDialog(null, "Erruer chemin");
        }
    }
    public Connection ObtenirConnexion(){
        return con;
    }
}






