package les_interfaces;

public interface file_dattente {
    public int taille();
    public void enfiler(String nom);
    public void defiler();
    public boolean filevide();
    public boolean filepleine();
}
