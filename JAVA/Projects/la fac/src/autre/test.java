package autre;

import java.util.Scanner;

public class test {

public static void main(String[] args) { 
    Scanner sc=new Scanner(System.in);
	try{	
          studio s=new studio(" amine hammou",5);
	  System.out.println("donner le nombre de chanteur");   
          int n=sc.nextInt();
          s.chanter(n);
        }
        catch(studio_excep e)
        {
            System.out.println(e.getMessage()); e.printStackTrace();
        }catch(Exception e){
            sc.close();
        }
}
}