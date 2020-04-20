
package tp8;


import java.util.Scanner;

public class principal3 {

	public static void main(String[] args) {

//2- Deux bloc Try Catch consecutifs

Scanner sc=new Scanner(System.in);
		int x,y;boolean stop=false,end=false;
		point p=null; 
		do {System.out.println("veuillez saisir les coordonnées du point");
		x=sc.nextInt();
		y=sc.nextInt();
		
		try{
			 p = new point (x,y);
			 stop=true;
			}
		catch(CoordonneesException e)
			{
			System.out.println("coordonées negatves");
			}
		}while(!stop);
		do {
			System.out.println("veuillez saisir le deplacement du point");
			int dx=sc.nextInt();
			int dy=sc.nextInt();
			 try {
			    p.deplacer(dx, dy);
			    end=true;
			 }catch(DeplacementException e) {System.out.println(e.getMessage());}
			}while(!end);
	}
}
