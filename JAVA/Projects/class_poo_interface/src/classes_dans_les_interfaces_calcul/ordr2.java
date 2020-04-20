
package classes_dans_les_interfaces_calcul;


public class ordr2 extends javax.swing.JFrame {

 
    public ordr2() {
        initComponents();

  this.setTitle("Fentetre"); //titre
        this.setSize(700, 350);  //taile 1 largeur 2 hauteur
        this.setLocationRelativeTo(null);//position centre
        this.setResizable(false); //taille inchangable
   

    }

 public String ordre( int a ) {  
 
     String b,s="";
  
 for (int j=1; j<a; j++)  { 
     
     b=Integer.toString(j);  s=s+" "+b;    
 } 

 return s;
 }
  public String ordre2( int a ) {  
   
     String b,z="";
  
  for (int j=a-1; j>=1; j--)  { 
     
     b=Integer.toString(j);  z=z+" "+b;    
 }
   return z;  
 }
  

  
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jButton1 = new javax.swing.JButton();
        jScrollPane3 = new javax.swing.JScrollPane();
        ta1 = new javax.swing.JTextArea();
        jScrollPane4 = new javax.swing.JScrollPane();
        ta2 = new javax.swing.JTextArea();
        t1 = new javax.swing.JTextField();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jButton1.setFont(new java.awt.Font("Ubuntu", 1, 18)); // NOI18N
        jButton1.setText("jButton2");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });

        ta1.setEditable(false);
        ta1.setColumns(20);
        ta1.setFont(new java.awt.Font("Ubuntu", 1, 22)); // NOI18N
        ta1.setRows(5);
        jScrollPane3.setViewportView(ta1);

        ta2.setEditable(false);
        ta2.setColumns(20);
        ta2.setFont(new java.awt.Font("Ubuntu", 1, 22)); // NOI18N
        ta2.setRows(5);
        jScrollPane4.setViewportView(ta2);

        t1.setFont(new java.awt.Font("Ubuntu", 1, 16)); // NOI18N
        t1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                t1ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addGap(0, 0, Short.MAX_VALUE)
                        .addComponent(jButton1))
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jScrollPane3, javax.swing.GroupLayout.PREFERRED_SIZE, 394, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jScrollPane4, javax.swing.GroupLayout.PREFERRED_SIZE, 394, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(t1, javax.swing.GroupLayout.PREFERRED_SIZE, 394, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(0, 0, Short.MAX_VALUE)))
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(37, 37, 37)
                .addComponent(t1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(jButton1)
                .addGap(30, 30, 30)
                .addComponent(jScrollPane3, javax.swing.GroupLayout.PREFERRED_SIZE, 51, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 29, Short.MAX_VALUE)
                .addComponent(jScrollPane4, javax.swing.GroupLayout.PREFERRED_SIZE, 51, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(22, 22, 22))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed

     int q=Integer.parseInt(t1.getText());
  ta1.setText("ordre croissant "+ordre(q));
     int r=Integer.parseInt(t1.getText());
  ta2.setText("ordre decroissant "+ordre2(r));
        
       
    }//GEN-LAST:event_jButton1ActionPerformed

    private void t1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_t1ActionPerformed

    }//GEN-LAST:event_t1ActionPerformed

   
    public static void main(String args[]) {
       
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new ordr2().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton jButton1;
    private javax.swing.JScrollPane jScrollPane3;
    private javax.swing.JScrollPane jScrollPane4;
    private javax.swing.JTextField t1;
    private javax.swing.JTextArea ta1;
    private javax.swing.JTextArea ta2;
    // End of variables declaration//GEN-END:variables
}
