
package tp8;

import java.util.Scanner;

public class principal {

   
    public static void main(String[] args) {

// 1- Un seul bloc Try catch :

		Scanner sc=new Scanner(System.in);
		int x,y;boolean end=false;
		point p;
                try{
                while(end){
                System.out.println("veuillez saisir les coordonnées du point");
		x=sc.nextInt();  	y=sc.nextInt();
			 p = new point (x,y);
			System.out.println("veuillez saisir le deplacement du point");
			int dx=sc.nextInt();
			int dy=sc.nextInt(); 
			  p.deplacer(dx, dy);
			  end=true;
               }
                    
                }catch(CoordonneesException e) {
                System.out.println("coordonées negatves");
                 }catch(DeplacementException e) {
                 System.out.println(e.getMessage()); 
                }
                
                }}

    
    

