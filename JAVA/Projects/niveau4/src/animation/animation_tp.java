package animation;
import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class animation_tp extends javax.swing.JFrame {   

    int i=10;    Timer t;   
 
 public animation_tp() {     
     initComponents();
      
         setTitle("Interface");
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setSize(700,700);
        setResizable(false);
      
t=new Timer(1000, new ActionListener() {
@Override
public void actionPerformed(ActionEvent e) {

if(i<=200){    getGraphics().drawOval(250-i,250-i,2*i,2*i);    i+=10;    } 
repaint();
 } } 
 );
t.start(); 
 }    
// public void paint2(Graphics q){
// super.paintComponents(q);
// q.setColor(Color.BLACK);
// }

 @Override
  public void paint(Graphics g){
 super.paintComponents(g);
  g.setColor(Color.BLACK);   g.fillRect(1000,1000,100,100);
  
 g.setColor(Color.GREEN);    g.drawLine(30,30,120,120);   g.fillRect(120,150,40,100);    g.drawOval(50,50,120,120);
 
 g.drawArc(100,100,100,100,0,90);  g.drawArc(200,200,100,100,90,90); g.drawArc(300,300,100,100,270,180);  g.drawArc(400,400,100,100,45,180); 

 int [] x={177,243,115,400};  int [] y={84,255,175,300};     g.drawPolygon(x,y,4);

for (int i = 10; i <= 200; i=i+10) {     g.drawOval(250-i,250-i,2*i,2*i);   }


Insets a=getInsets();
int left=a.left; /* 8 */    int top=a.top;   //35
g.setColor(Color.BLUE);   g.setFont(new Font("Arial",Font.BOLD,18));  g.drawString("salut",left+50,top+20);
//g.drawString("salut",8,35);


} 
   
         @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                formMouseClicked(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 664, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 390, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

  
    private void formMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_formMouseClicked

 for (int i = 0; i < 21; i++) {
        int x=(int)(Math.random()*700); int y=(int)(Math.random()*700);
        int wi=(int)(Math.random()*50); int he=(int)(Math.random()*50);
    if(wi<10){
         getGraphics().setColor(Color.yellow); getGraphics().fillRect(x, y,wi,he);
    }else{
        if(he<10){
             getGraphics().setColor(Color.GREEN);   getGraphics().fillRect(x, y,wi,he);
        }else{
             getGraphics().setColor(Color.WHITE);    getGraphics().fillRect(x,y,wi,he);
        }
    } 
 }
    

    }//GEN-LAST:event_formMouseClicked

    
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
            java.util.logging.Logger.getLogger(animation_tp.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(animation_tp.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(animation_tp.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(animation_tp.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new animation_tp().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    // End of variables declaration//GEN-END:variables
}
