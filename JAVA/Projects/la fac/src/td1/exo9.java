package td1;

import java.util.Scanner;

public class exo9 {
    
    
   static  int [][] remplissage1 ( int val1,int val2, int m [][] ) {
          
       for (int i = 0; i <m.length; i++) {
           for (int j = 0; j <m.length; j++) {               
              if(i % 2==0) 
                   m[i][j]=val1; 
                   else   m[i][j]=val2; 
           }}
     
       return m;
   }
    

static int [][] multimatrice(int[][] m1, int[][] m2) {
  
  int [][] r = new int[m1.length][m2.length];
  
  for ( int i = 0 ; i < m1.length ; i++ ) {
    for ( int j = 0 ; j <m2.length ; j++ ) {
  
        r[i][j] = m1[i][j]*m2[i][j];
     
} }
  return r;
}
     
static void affichematrice (int m [][] ){
             
    for (int i = 0; i <m.length; i++) {
        for (int j = 0; j <m.length; j++) {
            System.out.println(m[i][j]);
        }
    }
    
}

public static void main (String [] args){
   
       Scanner sc=new Scanner(System.in);
    System.out.println("donner n et m supérieure a zéro");
   int n=sc.nextInt(); int m=sc.nextInt();
  
   int [][] t=new int [n][m];
   int [][] t2=new int [n][m];
   
  remplissage1(5,6,t);       remplissage1(3,2,t2);     
    
  affichematrice(t);
  
    System.out.println("\n");
  
  int [][] t3 = multimatrice(t,t2);
   
  affichematrice(t3);
  

}}
