package autre;

import java.util.Scanner;
import java.util.Vector;
class tp7 {
	public static void main (String[] args)
	{
		Scanner clavier = new Scanner(System.in);
		int n,i,j,a,b,c,maxp=0; // Déclaration des variables
		char recommencer = 'O'; // Déclaration de la variable 'recommencer' qui permet de contrôler l'ajoute des éléments dans notre vecteur
		Vector<Integer> V = new Vector<Integer>(); // Déclaration de notre vecteur V
		System.out.print("Val = ");
		int VAL = clavier.nextInt(); // La lecture de VAL
		do {
			do {
				System.out.print("Donner un nombre : ");
				n=clavier.nextInt(); // La lecture de l'élément qu'on souhaite l'ajouter à notre vecteur
			}while ( n <= 0 );
			V.add(n); // Remplissage du vecteur
			if ( n%2==0 && n > maxp ) // Recherche des nombres paires et du maxp
				maxp = n;
			System.out.print("Voulez-vous ajouter un autre entier ? (O/N)");
			recommencer = clavier.next().charAt(0); // la lecture de 'recommencer' si on tape o.. le programme va nous permet d'ajouter d'autres éléments sinon d'arrêter l'ajout
		} while (V.size()<50 && recommencer == 'O' );
		System.out.println("Si val="+VAL+"	v="+V+"	maxp="+maxp);
		i=0;
		// Classement des éléments paires
		if (maxp!=0 && maxp<VAL)
		{
			while ( i< (V.size()-1))
			{
				a=V.elementAt(i);
				if(a%2 != 0 ){
					b=V.elementAt(i+1);
					if (b%2==0){
						V.setElementAt(b,i);
						V.setElementAt(a,i+1);
						j=i;
						while (i!=0){
							c = V.elementAt(i-1);
						if (c%2==0)
							i=0;
						else {
							V.setElementAt(c,i);
							V.setElementAt(b,i-1);
							i=i-1;
						}
						i=j;
						}
					}
					i=i+1;
				}
			System.out.println(" Maxp < VAL alors v ="+V);
			}

		}
		}
}
