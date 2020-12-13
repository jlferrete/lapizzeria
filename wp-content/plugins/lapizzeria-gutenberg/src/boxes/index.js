const { registerBlockType } = wp.blocks;

//Logo para el bloque
import { ReactComponent as Logo } from '../pizzeria-icon.svg';

registerBlockType('lapizzeria/boxes', {
    title: 'Pizzeria Cajas',
    icon: { src: Logo },
    category: 'lapizzeria',
    edit: () => {
        return (
            <h1>Se ve en el editor</h1>
        )
    },
    save: () => {
        return (
            <h1>Se ve en el frontend</h1>
        )
    }
});