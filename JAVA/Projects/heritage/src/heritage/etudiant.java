
package heritage;

import javax.swing.*;

public class etudiant extends personne {

    private  int num;

    public etudiant(String nom,String pre, int age,int num) {

        super(nom,pre,age);
        
        this.num = num;
    }
 
    public void Description (JLabel k) {
        k.setText("le nom est"+nom+"\n prénom est"+pre+"\n le num esr"+num+"\n");    
    }
    }
