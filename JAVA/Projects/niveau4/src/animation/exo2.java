
package animation;

import java.awt.*;   

public class exo2 extends javax.swing.JFrame {

 
    public exo2() {
        initComponents();
     setTitle("homme de naige");
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setSize(700,1500);
        setResizable(false);
    }
public void paint(Graphics g){
super.paintComponents(g);
    Insets i=getInsets();
    int l=i.left, t=i.top;
    g.setColor(Color.CYAN);  g.fillRect(l,580,700,120);
    g.setColor(Color.BLUE);  g.fillRect(l,580,700,120);
g.setColor(Color.YELLOW);   g.fillArc(l-100,t-100,200,200,270,90);
g.setColor(Color.white);   g.fillOval(l+190,t+429,320,125);  g.fillOval(l+240,t+279,199,160);  g.fillOval(l+300,t+205,80,80);
g.setColor(Color.BLACK);
g.drawLine(170,279,245,380);  g.drawLine(433,380,550,380);  g.drawLine(l+270,t+205,l+420,t+205);
g.fillRect(l+295,t+151,100,55);
g.fillOval(l+320,t+230,7,7);    g.fillOval(l+350,t+230,7,7);
g.drawArc(l+320,t+230,40,40,180,180);
g.setFont(new Font("Arial",Font.BOLD,28));
g.drawString("HAMMOU Amine",l+250,t+50);

}
 
    
    
    
    
    
    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc=" Generated Code ">//GEN-BEGIN:initComponents
    private void initComponents() {

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 400, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 300, Short.MAX_VALUE)
        );
        pack();
    }
    // </editor-fold>//GEN-END:initComponents

  
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
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(exo2.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(exo2.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(exo2.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(exo2.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new exo2().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    // End of variables declaration//GEN-END:variables
}
