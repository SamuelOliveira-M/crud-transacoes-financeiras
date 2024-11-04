import { Category } from "./category";

export interface Transaction {
  id: number;
  tipo: 'receita' | 'despesa'; // Define o tipo da transação
  valor: number; // Manter como string para valores monetários
  descricao: string;
  data: Date; // Pode ser um Date, mas aqui vamos manter como string para simplificação
  categoria_id: number;
  categoria: Category;
}
  