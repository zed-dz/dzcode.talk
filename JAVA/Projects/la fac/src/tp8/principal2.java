
package tp8;

import java.util.Scanner;

public class principal2 {

  //  3- Deux blocs Try Catch imbriqués :

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Scanner sc=new Scanner(System.in);
		int x,y;boolean stop=false,end=false;
		point p; 
		do {System.out.println("veuillez saisir les coordonnées du point");
		x=sc.nextInt();
		y=sc.nextInt();
		
		try{
			 p = new point (x,y);
			 stop=true;
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
			catch(CoordonneesException e)
			{
			System.out.println("coordonées negatves");
			}
		   
		}while(!stop);
		
	}

}
  
