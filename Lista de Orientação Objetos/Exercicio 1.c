public class Ponto {
    private int x;
    private int y;
    private static int contadorPontos = 0;
    
    public Ponto(int x, int y) {
        this.x = x;
        this.y = y;
        contadorPontos++;
    }
    
    public static int getContadorPontos() {
        return contadorPontos;
    }
    
    public void setX(int x) {
        this.x = x;
    }
    
    public int getX() {
        return x;
    }
    
    public void setY(int y) {
        this.y = y;
    }
    
    public int getY() {
        return y;
    }
    
    public void deslocar(int dx, int dy) {
        x += dx;
        y += dy;
    }
    
    public String toString() {
        return "(" + x + ", " + y + ")";
    }
    
    public double distancia(Ponto outroPonto) {
        int deltaX = outroPonto.getX() - this.x;
        int deltaY = outroPonto.getY() - this.y;
        return Math.sqrt(Math.pow(deltaX, 2) + Math.pow(deltaY, 2));
    }
    
    public double distancia(int x2, int y2) {
        int deltaX = x2 - this.x;
        int deltaY = y2 - this.y;
        return Math.sqrt(Math.pow(deltaX, 2) + Math.pow(deltaY, 2));
    }
    
    public static double distancia(int x1, int y1, int x2, int y2) {
        int deltaX = x2 - x1;
        int deltaY = y2 - y1;
        return Math.sqrt(Math.pow(deltaX, 2) + Math.pow(deltaY, 2));
    }
}
