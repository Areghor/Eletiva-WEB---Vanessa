public class Servente extends Funcionario {
    public Servente(int codigo, String nome, double salarioBase) {
        super(codigo, nome, salarioBase);
    }

    @Override
    public double getSalarioLiquido() {
        double salarioBase = super.getSalarioBase();
        double adicionalInsalubridade = salarioBase * 0.05;
        return salarioBase + adicionalInsalubridade;
    }
}

public class Motorista extends Funcionario {
    private String numeroCarteiraMotorista;

    public Motorista(int codigo, String nome, double salarioBase, String numeroCarteiraMotorista) {
        super(codigo, nome, salarioBase);
        this.numeroCarteiraMotorista = numeroCarteiraMotorista;
    }

    public String getNumeroCarteiraMotorista() {
        return numeroCarteiraMotorista;
    }

    public void setNumeroCarteiraMotorista(String numeroCarteiraMotorista) {
        this.numeroCarteiraMotorista = numeroCarteiraMotorista;
    }
}

public class MestreDeObras extends Servente {
    private int quantidadeFuncionarios;

    public MestreDeObras(int codigo, String nome, double salarioBase, int quantidadeFuncionarios) {
        super(codigo, nome, salarioBase);
        this.quantidadeFuncionarios = quantidadeFuncionarios;
    }

    @Override
    public double getSalarioLiquido() {
        double salarioBase = super.getSalarioBase();
        double adicionalInsalubridade = salarioBase * 0.05;
        double adicionalSupervisao = (quantidadeFuncionarios / 10) * (salarioBase * 0.1);
        return salarioBase + adicionalInsalubridade + adicionalSupervisao;
    }

    public int getQuantidadeFuncionarios() {
        return quantidadeFuncionarios;
    }

    public void setQuantidadeFuncionarios(int quantidadeFuncionarios) {
        this.quantidadeFuncionarios = quantidadeFuncionarios;
    }
}
