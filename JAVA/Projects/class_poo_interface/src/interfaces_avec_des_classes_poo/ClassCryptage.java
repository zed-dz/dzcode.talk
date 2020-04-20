package interfaces_avec_des_classes_poo;

public class ClassCryptage {
    public String k;

    public ClassCryptage(String k) {
        this.k = k;
    }

  public String Cryptage(){
        String c="";
        for(int i=0;i<k.length();i++){
            switch(k.charAt(i)){
                case 'a':
                    c=c+'d';
                    break;
               case 'b':
                    c=c+'e';
                    break; 
                    case 'c':
                    c=c+'f';
                    break;
                    case 'd':
                    c=c+'g';
                    break;
               case 'e':
                    c=c+'h';
                    break; 
                    case 'f':
                    c=c+'i';
                    break;
                    
               }
            
        }
        
        return c;
    
      }}
