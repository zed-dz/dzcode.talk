package interfaces_avec_des_classes_poo;




import java.util.ArrayList;
import javax.swing.JOptionPane;

public class ip extends javax.swing.JFrame {

    ArrayList<String> l1=new  ArrayList<String>();
  int j=0;

    
    public ip() {
        initComponents();
    }
         
    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jButton1 = new javax.swing.JButton();
        jScrollPane1 = new javax.swing.JScrollPane();
        t1 = new javax.swing.JTextArea();
        jScrollPane2 = new javax.swing.JScrollPane();
        t2 = new javax.swing.JTextArea();
        jScrollPane3 = new javax.swing.JScrollPane();
        t3 = new javax.swing.JTextArea();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jButton1.setText("jButton1");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });

        t1.setColumns(20);
        t1.setRows(5);
        jScrollPane1.setViewportView(t1);

        t2.setColumns(20);
        t2.setRows(5);
        jScrollPane2.setViewportView(t2);

        t3.setColumns(20);
        t3.setRows(5);
        jScrollPane3.setViewportView(t3);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addGap(0, 0, Short.MAX_VALUE)
                .addComponent(jButton1, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(46, 46, 46))
            .addGroup(layout.createSequentialGroup()
                .addGap(57, 57, 57)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jScrollPane3, javax.swing.GroupLayout.PREFERRED_SIZE, 334, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 334, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 334, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(238, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(27, 27, 27)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 72, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(26, 26, 26)
                .addComponent(jButton1, javax.swing.GroupLayout.PREFERRED_SIZE, 41, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 7, Short.MAX_VALUE)
                .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 64, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(66, 66, 66)
                .addComponent(jScrollPane3, javax.swing.GroupLayout.PREFERRED_SIZE, 68, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(16, 16, 16))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
  if(  j<(255*255) ) { //hadi za3ma kayan 255*255 utilisateurs 
            String nm=t1.getText(); 
            String ag=t2.getText();
         Clientip cl=new Clientip(nm, ag); 
            String a=Integer.toString((int)(Math.random()*255));
            String b=Integer.toString((int)(Math.random()*255));
            if(!l1.contains(a+b)){  //hadi pr eviter les doublans 
                l1.add(a+b);
 t3.append("nom : "+cl.nom+" age : "+cl.age+" adresse ip : 127.1."+a+"."+b+"\n");
      j++;
 t1.setText("");
 t2.setText("");
            } 
  }else{ JOptionPane.showMessageDialog(null, "erreur esseyer encore","erreur",JOptionPane.ERROR_MESSAGE);  }
                 
    }//GEN-LAST:event_jButton1ActionPerformed

 
    public static void main(String args[]) {
       
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new ip().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton jButton1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JScrollPane jScrollPane3;
    private javax.swing.JTextArea t1;
    private javax.swing.JTextArea t2;
    private javax.swing.JTextArea t3;
    // End of variables declaration//GEN-END:variables
}
