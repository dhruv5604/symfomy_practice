import { startStimulusApp } from '@symfony/stimulus-bridge';

export const app = startStimulusApp(require.context(
    './controllers',  // ✅ NO lazy loader here
    true,
    /\.(j|t)sx?$/
));
