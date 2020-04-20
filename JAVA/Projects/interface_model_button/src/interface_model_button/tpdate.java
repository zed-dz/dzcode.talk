package interface_model_button;

//import java.util.*; //biblio des dates
//import java.text.*; //biblio des simples dates format

import java.text.SimpleDateFormat;
import java.util.Date;


public class tpdate extends javax.swing.JFrame {


    public tpdate() {

        initComponents();
    
        afficherdate();
    
                    }
    
public void  afficherdate(){

        Date s=new Date();                  // une format de date et heure par default  
        
        ta.append(s +"\n \n");          //  wed Nov 22 20:27:46 CET 2017
        
        SimpleDateFormat df= new SimpleDateFormat();            // une simple format de lheure comprenable
      
        ta.append(df.format(s)+"\n \n");         // 11/22/17 8:27 PM
        
        SimpleDateFormat sdf= new SimpleDateFormat("dd/MM/yyyy hh:mm:ss");          //une format quon veut 
        
        ta.append(sdf.format(s)+"\n \n");       // 22/11/2017 08:27:46
        
         SimpleDateFormat sd= new SimpleDateFormat("hh:mm:ss");          //une format quon veut 
        
        ta.append(sd.format(s)+"\n \n");       // 08:27:46
        
        try{
            
         String ds="20/02/2000";         
       
         SimpleDateFormat sdf1=new SimpleDateFormat("dd/MM/yyyy");           //on rend ce string ver une date precis comme elle est ecrite
        
         Date d=sdf1.parse(ds);                                        //puis en le converte vers la format initial de date qui nas aucun sence
        
         SimpleDateFormat sdf2=new SimpleDateFormat("yyyy-MM-dd");        //puis de cette anciene format on le change vers la format quon veut
        
         ta.append(sdf2.format(d));                                          //puis on laffiche selon la nouvelle format  2000-02-20
        
        }catch(Exception e){}
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
                .addGap(58, 58, 58)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 521, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(156, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(30, 30, 30)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 290, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(111, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents


    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException | InstantiationException | IllegalAccessException | javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(tpdate.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            @Override
            public void run() {
                new tpdate().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTextArea ta;
    // End of variables declaration//GEN-END:variables
}
