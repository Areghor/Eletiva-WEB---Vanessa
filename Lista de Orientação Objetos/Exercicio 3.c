public abstract class Telefone {
    protected int ddd;
    protected String numero;

    public Telefone(int ddd, String numero) {
        this.ddd = ddd;
        this.numero = numero;
    }

    public abstract double calculaCusto(int tempoLigacao);
}

public class Fixo extends Telefone {
    private double custoPorMinuto;

    public Fixo(int ddd, String numero, double custoPorMinuto) {
        super(ddd, numero);
        this.custoPorMinuto = custoPorMinuto;
    }

    @Override
    public double calculaCusto(int tempoLigacao) {
        return tempoLigacao * custoPorMinuto;
    }
}

public abstract class Celular extends Telefone {
    protected double custoMinutoBase;
    protected String operadora;

    public Celular(int ddd, String numero, double custoMinutoBase, String operadora) {
        super(ddd, numero);
        this.custoMinutoBase = custoMinutoBase;
        this.operadora = operadora;
    }
}

public class PrePago extends Celular {
    public PrePago(int ddd, String numero, double custoMinutoBase, String operadora) {
        super(ddd, numero, custoMinutoBase, operadora);
    }

    @Override
    public double calculaCusto(int tempoLigacao) {
        return tempoLigacao * custoMinutoBase * 1.4; // 40% de acréscimo
    }
}

public class PosPago extends Celular {
    public PosPago(int ddd, String numero, double custoMinutoBase, String operadora) {
        super(ddd, numero, custoMinutoBase, operadora);
    }

    @Override
    public double calculaCusto(int tempoLigacao) {
        return tempoLigacao * custoMinutoBase * 0.9; // 10% de desconto
    }
}
