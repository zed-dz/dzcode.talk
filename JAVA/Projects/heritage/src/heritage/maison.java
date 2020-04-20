
package heritage;

import javax.swing.*;

public class maison extends batiment{

    private int nbpic;

    public maison(int nbpic, String adress) {
        super(adress); //pour forcer lajout dans le constructeur sans definir et cest un ajout qui permet dajouter de sa classe mere 
        this.nbpic = nbpic;
    }
 
  public void affichage (JLabel c) {
        c.setText(adress+" et son nombre de piece est "+nbpic);    
    }
}

