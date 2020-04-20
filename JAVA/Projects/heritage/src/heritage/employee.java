
package heritage;

import javax.swing.*;

public class employee extends personne {

    private  int salaire;
 

public employee(String nom, String pre,int age,int salaire) {
     
    super(nom,pre,age);

     this.salaire = salaire;
 
}
 
    public void Description (JLabel k) {   //import javax.swing.*;

     k.setText("le nom est"+nom+"\n prénom est"+pre+" \n le salaire esr"+salaire+"\n");    

    }
    }
