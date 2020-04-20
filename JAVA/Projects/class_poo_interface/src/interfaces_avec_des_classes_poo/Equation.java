package interfaces_avec_des_classes_poo;

   public class Equation {
      public double r4,r2,r3,r5,delta,a,b,c; 
      public Equation(double a, double b, double c) {
           this.a = a;
           this.b = b;
           this.c = c; 
   delta = Math.pow(b,2)-4*a*c;      
      }
 public void calcul(){
           if(a==0){ r5=-c/b; }
     else if(delta==0) { r2=(-b)/(2*a); }
     else if (delta > 0) {
         r3 = ((-b) - Math.sqrt(delta)) /(2*a);
         r4 = ((-b) + Math.sqrt(delta))/(2*a);  }
   
 }
 public String affichage() {
 String k="";
  if(a==0 && b==0 && c==0) { k+="ya une infinity de solution"; }
     else if (a==0 && b==0) { k+="ya aucune solution";  }
      else if(a==0){ k+=r5; }
      else if(delta==0) { k+=" ya une double solution "+r2; }
      else if(delta>0){ k+="la premiere solution est "+r3+"\n" +" la deuxieme solution est "+r4;  }
           else{ k+="ya pas de solution dans R "; }
 return k;
 }
 
 }

