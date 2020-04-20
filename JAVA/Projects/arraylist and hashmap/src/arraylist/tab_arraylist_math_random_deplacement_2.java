package arraylist;

import java.util.*;

public class tab_arraylist_math_random_deplacement_2 extends javax.swing.JFrame {

    ArrayList<Integer> l1=new ArrayList<Integer>();  //ndiro une nouvelle array list n7ato fiha les valeurs t3 lancien tab
   
    public tab_arraylist_math_random_deplacement_2(int [] t) {  //le constructeur hna yjibna le tab a cause du deplacemnt entre page
        
        initComponents();
    
        int i=0;
        while(i<t.length){  //ou bien avec une boucle for 
            int k=(int)(Math.random()*t.length);   //pr que math.random nous donne des numéro entier quon as saisie 
            if(!l1.contains(t[k])){   // pr lobliger a ne pas contenir des doublants 
                ta.append(t[k]+"\n"); //nnafichiw la 1er valeur du tab et ainsi de suite 
                l1.add(t[k]); //    n3amro la nouvelle liste
            } i++;  
            
        }
    }

    private tab_arraylist_math_random_deplacement_2() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

  
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jScrollPane1 = new javax.swing.JScrollPane();
        ta = new javax.swing.JTextArea();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        ta.setColumns(20);
        ta.setRows(5);
        jScrollPane1.setViewportView(ta);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(99, 99, 99)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 336, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(111, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(108, Short.MAX_VALUE)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 223, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(101, 101, 101))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    
    public static void main(String args[]) {
       
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new tab_arraylist_math_random_deplacement_2().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTextArea ta;
    // End of variables declaration//GEN-END:variables
}
