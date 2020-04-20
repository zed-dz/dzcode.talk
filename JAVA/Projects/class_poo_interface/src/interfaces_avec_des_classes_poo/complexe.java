package interfaces_avec_des_classes_poo;

public class complexe {
public double re,im;    
public complexe(double re, double im) {
        this.re = re;
        this.im = im;

    }
public String affichage(){
 String k;
    if(re<0) { k=im+"i"+re; }
   else { k=im+"i+"+re; }
    return k;
}
public String addition (complexe z) {
    re=re+z.re;
    im=im+z.im;
    return re+" i*"+im;
}  

}
